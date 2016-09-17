# Introduction
Khai Pham Arc Website

### Installation
`git clone https://PhuongVV@bitbucket.org/PhuongVV/decoks.git && cd decoks`

### Environment
`cp .env.example .env`
### Configuration
`vim .env`
### Dependencies
`composer install && npm install && bower install`
### Migration
`php artisan migrate:refresh --seed`
### Assets Compiling
`gulp`
### Tests
`vendor/bin/behat&&vendor/bin/phpunit`
### Development
`gulp watch`



### Notice
Remember to run `composer dump-auto`
