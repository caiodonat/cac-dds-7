#!/bin/bash

echo "instalando ambiente de desenvolvimento";
sudo apt install  php php-curl php-xml php-mbstring php-mysql composer vim git curl

echo "instalando nodejs";
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.35.3/install.sh &&
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.35.3/install.sh | bash &&
source ~/.bashrc &&
nvm install v16.15.1 &&
npm install -g npm@8.13.2 &&

echo "download vsocde e chrome";


echo "clonado projeto tcc";
cd Documents/ &&
git clone https://github.com/CaioDonat/CentralAtendimentoCliente2/tree/servidor &&
cd CentralAtendimentoCliente2 &&
git checkout servidor &&

echo "atualizando composer";
composer update &&
composer upgrade &&
composer install &&
npm install &&
npm run dev &&

cd ~/ &&

echo "atulizando sistema"
sudo apt-get update -y &&
sudo apt-get full-upgrade &&