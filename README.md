# Project Unpause
> A Laravel Content Management System for your resume / CV.

A Deployable Laravel web app template for creating-hosting-and-managing your resume or CV. The main feature of this web app is the custom fields for your various CV needs. You can add various attributes that you want without limitations such as: 'work', 'experience', 'achievement' and many more. Display your custom CV with customizeable template using your own vue component.

![](header.png)

------

## Depedency

- XAMPP (or Mysql)

## Installation

initial configuration for laravel project
```sh
cp .env.example .env
```
```sh
composer install
```
```sh
php artisan key:generate
```
```sh
php artisan migrate
```
```sh
php artisan storage:link
```
Installing depedency for vue
```sh
npm install
```
Build vue apps
```sh
npm run dev
```
Or using (for hot-reload)
```sh
npm run watch
```
Run laravel
```sh
php artisan serve
```

## Usage example

Deploy it in your hosted site. See our example site here [resume.frz.codes](resume.frz.codes).


## Development History

* 0.1.0 (Jan 2021)
    * Implement profile feature
    * Implement CV feature
    * Implement custom field feature

* 0.0.1 (2020)
    * Work in progress


## Contributing

1. See issue
2. Fork it (<https://github.com/kulkasdingin/laravel-resume>)
3. Create your feature branch (`git checkout -b feature/fooBar`)
4. Commit your changes (`git commit -am 'Add some fooBar'`)
5. Push to the branch (`git push origin feature/fooBar`)
6. Create a new Pull Request


## Initial Development Team

Ahmad Naufal Hilmy – [anhilmy](https://github.com/anhilmy)

Ariq Naufal Satria – [Arnastria](https://github.com/Arnastria)

Douglas Raevan Faisal – [douglasraevan](https://github.com/douglasraevan)

Muhamad Fariz Farhan – [kulkasdingin](https://github.com/kulkasdingin)

Ramawajdi Kanishka Anwar – [ramawajdika](https://github.com/ramawajdika)

## Lisence
Distributed under the [MIT license](https://opensource.org/licenses/MIT). See ``LICENSE`` for more information.
