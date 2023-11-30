<p align="center">
  <a href="https://vitejs.dev" target="_blank" rel="noopener noreferrer">
    <img width="180" src="https://vitejs.dev/logo.svg" alt="Vite logo">
  </a>
</p>
<br/>

# Docker - Wordpress - Vite ⚡ - Php Live Reload - Composer

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
| Packages                        |
|-------------------------------------|
| ![Dynamic JSON Badge](https://img.shields.io/badge/dynamic/json?url=https%3A%2F%2Fraw.githubusercontent.com%2FAntonin06%2FWordpress-Docker-Vite-HMR%2Fmain%2Fwp-content%2Fthemes%2Fantonin%2Fpackage.json&query=%24.devDependencies.vite&logo=vite&logoColor=%23646CFF&label=Vite)|
| ![Dynamic JSON Badge](https://img.shields.io/badge/dynamic/json?url=https%3A%2F%2Fraw.githubusercontent.com%2FAntonin06%2FWordpress-Docker-Vite-HMR%2Fmain%2Fwp-content%2Fthemes%2Fantonin%2Fpackage.json&query=%24.devDependencies.sass&logo=sass&logoColor=%23CC6699&label=Sass) |
| ![Dynamic JSON Badge](https://img.shields.io/badge/dynamic/json?url=https%3A%2F%2Fraw.githubusercontent.com%2FAntonin06%2FWordpress-Docker-Vite-HMR%2Fmain%2Fwp-content%2Fthemes%2Fantonin%2Fpackage.json&query=%24.devDependencies.chokidar&label=Chokidar) |
| ![Dynamic JSON Badge](https://img.shields.io/badge/dynamic/json?url=https%3A%2F%2Fraw.githubusercontent.com%2FAntonin06%2FWordpress-Docker-Vite-HMR%2Fmain%2Fwp-content%2Fthemes%2Fantonin%2Fpackage.json&query=%24.devDependencies.picocolors&label=Picocolors) |
