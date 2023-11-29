
# Docker - Wordpress - Vite JS HMR - Composer


## Installation

```bash
git clone https://github.com/Antonin06/Wordpress-Docker-Vite-HMR
  
composer install

# Setup your env variables
cp .env.example .env 

make start
```
    


## Themes

Activer le theme dans le BO Wordpress

```bash
cd wp-content/themes/antonin

nvm use

npm install

npm run build && npm run dev
```
| Package                             | Version (click for changelogs)                                                                                                                                                      |
|-------------------------------------|:------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| [vite](packages/vite)               | ![Dynamic JSON Badge](https://img.shields.io/badge/dynamic/json?url=https%3A%2F%2Fraw.githubusercontent.com%2FAntonin06%2FWordpress-Docker-Vite-HMR%2Fmain%2Fwp-content%2Fthemes%2Fantonin%2Fpackage.json&query=%24.devDependencies.vite&label=Vite)
                                                                                                                         |
