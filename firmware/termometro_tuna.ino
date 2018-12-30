const int TMP102_ADDRESS = 0x48;
const int TMP102_BYTES = 2;
const int TMP102_RETRY = 3;

double temp = -0xff;
int err = 1;
const unsigned long SAMPLE_RATE = 30000;
unsigned long lastSample = 0;

const char *publishEvent = "temperature/5min";
const unsigned long PUBLISH_RATE = 300000;
unsigned long lastPublish = 0;
char buffer[8];

const unsigned long BLINK_RATE = 1000;
unsigned long lastBlink = 0;
int led = LOW;

void setup() {
  Particle.variable("temperature", temp);
  Particle.variable("error", err);
  pinMode(D7, OUTPUT);
  Wire.begin();
}

void loop() {
  if (lastSample + SAMPLE_RATE < millis()) {
    for (int r = 0; r < TMP102_RETRY; r++) {
      if (Wire.isEnabled()) {
        Wire.requestFrom(TMP102_ADDRESS, TMP102_BYTES);
        if (Wire.available() == TMP102_BYTES) {
          byte MSB = Wire.read();
          byte LSB = Wire.read();
          temp = ((( MSB << 8) | LSB) >> 4) * 0.0625;
          err = 0;
          break;
        } else {
          temp = -0xff;
          err = 3;
        }
      } else {
        temp = -0xff;
        err = 2;
      }
    }
  }
  if (lastPublish + PUBLISH_RATE < millis()) {
    sprintf(buffer, "%.1f", temp);
    Particle.publish(publishEvent, buffer);
    lastPublish = millis();
  }
  if (lastBlink + BLINK_RATE < millis()) {
    digitalWrite(D7, (led) ? HIGH : LOW);
    led = !led;
    lastBlink = millis();
  }
}
