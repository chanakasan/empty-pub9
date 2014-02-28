APACHEUSER=`ps aux | grep -E '[a]pache|[h]ttpd' | grep -v root | head -1 | cut -d\  -f1`
setfacl -R -m u:$APACHEUSER:rwX -m u:`whoami`:rwX app/cache app/logs
setfacl -dR -m u:$APACHEUSER:rwX -m u:`whoami`:rwX app/cache app/logs