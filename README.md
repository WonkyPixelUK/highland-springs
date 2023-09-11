# Astro

## Requirements

- HomeBrew (https://brew.sh/)
- YQ (https://formulae.brew.sh/formula/yq)
- Lando (https://github.com/lando/lando/releases/latest)
- Composer (https://getcomposer.org/)
- PNPM (https://pnpm.io/installation)
You can install this globally using `npm i -g pnpm`

## Setup

Firstly, create a new repo and set it up with a default README. Pull the base repo and give it a unique folder e.g. your new project name.

    git clone git@github.com:AstroAgency/base.git NEW-PROJECT-NAME

After cloning, change into the new directory and use the setup shell script to get everything downloaded and setup correctly. Follow the prompts. When asked about the Git repo, please copy and paste in the SSH URL from your new projects Git repo, as seen here:

![Screenshot 2023-08-18 at 09 05 30](https://github.com/AstroAgency/base/assets/3071768/a41caef7-1866-433d-8535-bcb49383177e)

    sh config/create.sh

This will take up to 5 minutes to complete, depending how many things you already have installed.

Once completed, the script will give you the URL to your new base Wordpress theme along with the username and password for WP Admin.

## Setup existing website

If the repo and site already exist, then clone normally.

    git clone git@github.com:AstroAgency/PROJECT-NAME.git

Then run the setup script. This will install WP and requirements in Composer and PNPM

    sh config/setup.sh

## Development

To start active development, simply use the dev shell script. This will start Lando, pull latest composer items and run Vite in dev mode; which auto reloads PHP, SASS, Twig and HTML.

    sh config/dev.sh

## Production

When development is complete, a production build can be created. This will create a `dist` directory where all images, fonts and minified JS/CSS will go. This directory it what will be uploaded in place of `src`.

    sh config/prod.sh

## Messing Up

It's fine to screw up, you can easily start over. To nuke the whole setup, simply run the reset shell script and start this whole process over

    sh config reset.sh

## Notes

 - This will never be complete, its an ever growing, changing and adapting theme
 - The Base Theme is to save setup times, development times and to stop repetitive coding as much as possible, so that we can all concentrate on the cool, meaty stuff.
