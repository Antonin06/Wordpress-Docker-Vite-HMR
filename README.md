
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