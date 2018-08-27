# InfoLibras-IFSP

Aplicação de acessibilidade para surdos no IFSP - Campus GRU

## Iniciando

Baixe o projeto na sua máquina com:

``$git clone git@git.ifspguarulhos.edu.br:gu1662287/InfoLibras-IFSP.git``

### Pré-requisitos
Para o projeto rodar em sua maquina, voce necessita das seguintes depedencias:
````
* PHP >= 7.1.3
* Composer
* NPM >= 3.5.2
````

### Instalação

Depois de clonar o projeto em sua maquina sera necessario rodar 2 comandos:

1 - para instalar as dependencias do Composer.

``$ composer install``

2 - para instalar as dependencias do NPM.

``$ npm install``

3 - Crie uma copia do arquivo .env

``$ cp .env.example .env``

4 - Gere a chave de encriptaçao da aplicacao

``$ php artisan key:generate`` 

## Rodando Testes

````
soon..
````
## Construido com

* Laravel - Laravel is a web application framework with expressive, elegant syntax.
* Composer - Dependency Manager for PHP
* BootStrap - Bootstrap is an open source toolkit for developing with HTML, CSS, and JS.
* NPM - npm is the package manager for JavaScript and the world’s largest software registry.

## Autores

* Felipe Passada    - [Felipe] https://www.linkedin.com/in/felipe-p-142432b7/
* Danilo Batista    - [Danilo] https://www.linkedin.com/in/danilobatista/
* Cesar Cutolo      - [Cesar]  https://www.linkedin.com/in/cesar-cutolo-910a55a3/
