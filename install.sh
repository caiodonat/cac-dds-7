#!/bin/bash

sudo apt remove php composer 
echo "instalando ambiente de desenvolvimento";
sudo apt install  php php-curl php-xml php-mbstring php-mysql composer vim git curl

function nodejs(){
echo "instalando nodejs";
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.35.3/install.sh 
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.35.3/install.sh | bash 
source ~/.bashrc 
nvm install v16.15.1 
npm install -g npm@8.13.2 
}

function composer(){
echo "Instalando composer";
wget https://getcomposer.org/download/2.3.9/composer.phar  
cd Downloads 
chmod +x composer.phar 
sudo mv composer.phar /usr/local/bin/composer 

}

function cloneTcc(){
echo "clonado projeto tcc";
cd Documents 
if($clone git clone https://github.com/sCaioDonat/CentralAtendimentoCliente2.git)
{
    return $clone
}else{
    cd CentralAtendimentoCliente2     
}

git checkout servidor 

echo "atualizando composer";
composer reinstall psr/log 
composer update 
composer upgrade 
composer install 
npm install 
npm run dev 
}

cd ~/ 

echo "atulizando sistema"
sudo apt-get update -y 
sudo apt-get full-upgrade 