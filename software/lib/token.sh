curl https://api.particle.io/oauth/token \
     -u particle:particle \
     -d grant_type=password \
     -d expires_in=0 \
     -d "username=${USER}" \
     -d "password=${PASS}"
