# Set some colours
GREEN="\e[32m"
ENDCOLOR="\e[0m"

# Asks for name of project
echo What is the name of this project?
read name
export name

# Asks for slug of project
echo What is the slug \(e.g. astro-theme\) of this project?
read slug
export slug

# Asks for new git repo path
echo What is Git repo of this project?
read repo
export repo

# Make orphan branch - to ignore history
git checkout --orphan init-branch

# Set git origin to new repo
git remote set-url origin "${repo}"

# Sets name in the .lando.yml file
yq e -i '.name = env(slug)' .lando.yml

# CREATE ACCESS TOKEN
curl --silent -X POST -d 'api_key=YRGsW0VyW985I7CZ5J1whEFIzNo3RH&email=richard@astroagency.uk' https://api.cloudways.com/api/v1/oauth/access_token | yq -P > config/cloudways.yml

sleep 1

# SAVE ACCESS TOKEN
ACCESS_TOKEN=$(yq -e '.access_token' config/cloudways.yml)

# CREATE APPLICATION ON CLOUDWAYS
curl --silent -X POST -d 'access_token='${ACCESS_TOKEN}'&server_id=926960&app_label='"$name"'&application=wordpress' https://api.cloudways.com/api/v1/app | yq -P > config/cloudways.yml

# OPERATION ID
OPERATION_ID=$(yq -e '.operation_id' config/cloudways.yml)

curl --silent -X GET --header 'Authorization: Bearer '${ACCESS_TOKEN} 'https://api.cloudways.com/api/v1/operation/'${OPERATION_ID} | yq -p=json -P > config/cloudways.yml

sleep 4

OPERATION_COMPLETE=$(yq -e '.operation.is_completed' config/cloudways.yml)

sleep 1

echo "Cloudways server is being setup....."

until [ ${OPERATION_COMPLETE} = "1" ];
do
  	sleep 30
  	echo "Cloudways server is still being setup....."
  	curl --silent -X GET --header 'Authorization: Bearer '${ACCESS_TOKEN} 'https://api.cloudways.com/api/v1/operation/'${OPERATION_ID} | yq -p=json -P > config/cloudways.yml
	OPERATION_COMPLETE=$(yq -e '.operation.is_completed' config/cloudways.yml)
done

# GET LIST OFF ALL SERVERS
curl --silent -X GET --header 'Authorization: Bearer '${ACCESS_TOKEN} 'https://api.cloudways.com/api/v1/server' | yq -p=json -P > config/cloudways.yml

sleep 2

# REVERSE ORDER OF APPS LIST SO WE GET THE LATEST APP - THE ONE WE JUST CREATED
APP_UNIQUE=$(yq -e '.servers[0].apps | reverse | .[0:1] | .[0].sys_user' config/cloudways.yml)
# APP_ID=$(yq -e '.servers[0].apps | reverse | .[0:1] | .[0].id' config/cloudways.yml)

# Sets correct site path in the deploy.yml file
yq e -i '.env.SSH_DESTINATION = "/home/926960.cloudwaysapps.com/'${APP_UNIQUE}'/public_html/"' .github/workflows/deploy.yml

yq e -i '.name = env(slug)' .lando.yml

# SET APP LOGINS
# curl --silent -X POST -d 'access_token='${ACCESS_TOKEN}'&server_id=926960&app_id='"$APP_ID"'&username=astroaccess&password=yE8mHJs6Cx' https://api.cloudways.com/api/v1/app/creds | yq -P > config/cloudways.yml

# TURN ON SSH
# curl --silent -X POST -d 'access_token='${ACCESS_TOKEN}'&server_id=926960&app_id='"$APP_ID"'&update_perms_action=enable' https://api.cloudways.com/api/v1/app/updateAppSshPerms | yq -P > config/cloudways.yml

# Install everything needed for Lando. Starts Lando. Stars Docker.
lando start

mkdir wp
cd wp

# Downloads latest Wordpress
lando wp core download --locale=en_GB

# Install Wordpress
lando wp core install --url="${slug}".lndo.site --title="${name}" --admin_name=admin --admin_password=admin --admin_email=admin@webpulse.uk

lando wp option update siteurl $(lando wp option get siteurl)/wp

cd ../

# Installs all core Wordpress plugins needed
lando composer i

# Installs all packages needed for development
pnpm i

cd wp

# Activate all plugins
lando wp plugin activate --all

# Activate Astro theme
lando wp theme activate astro

POSTID=$(lando wp post create --post_type=page --post_title='Welcome to Astro' --post_name="welcome" --post_status=publish --porcelain)

# Set reading option to post just created
lando wp option update page_on_front "${POSTID}"

# Set reading option to be page - will use post set above
lando wp option update show_on_front page

cd ../

# Add everything to new branch
git add --all

# Commit branch
git commit -m "Initial commit"

# Replace old master with new with no history
git branch -D master
git branch -m master
git push -f origin master

pnpm run build

# Output site url and wp admin logins
echo $(printf "${GREEN}-----------------------------------${ENDCOLOR}")
echo $(printf "${GREEN}WEBSITE IS READY!${ENDCOLOR}")
echo $(printf "Site: ${GREEN}https://${slug}.lndo.site${ENDCOLOR}")
echo Username: admin
echo Password: admin
echo $(printf "${GREEN}-----------------------------------${ENDCOLOR}")