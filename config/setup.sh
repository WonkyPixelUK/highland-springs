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

pnpm run build

# Output site url and wp admin logins
echo $(printf "${GREEN}-----------------------------------${ENDCOLOR}")
echo $(printf "${GREEN}WEBSITE IS READY!${ENDCOLOR}")
echo $(printf "Site: ${GREEN}https://${slug}.lndo.site${ENDCOLOR}")
echo Username: admin
echo Password: admin
echo $(printf "${GREEN}-----------------------------------${ENDCOLOR}")