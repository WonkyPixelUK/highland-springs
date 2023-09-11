lando destroy -y

rm -rf composer.lock
rm -rf pnpm-lock.yaml

rm -rf config/cloudways.yml

rm -rf wp
rm -rf vendor
rm -rf node_modules

rm -rf wp-content/plugins
rm -rf wp-content/languages
rm -rf wp-content/upgrade
rm -rf wp-content/uploads

rm -rf wp-content/themes/astro/dist