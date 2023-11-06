
<div align="center">
<h3 align="center">Backend Case Study</h3>
</div>


## About The Project

<img width="1552" alt="Screenshot 2023-11-06 at 15 59 33" src="https://github.com/orhngkc/case-study/assets/63417988/e7303f7a-093d-4646-a2c4-bea78b570146">


An algorithm that helps to complete the work list in the shortest time while distributing the work appropriately to developers.

### Built With
* [![Laravel][Laravel.com]][Laravel-url]
* [![Bootstrap][Bootstrap.com]][Bootstrap-url]
* [![JQuery][JQuery.com]][JQuery-url]

<!-- GETTING STARTED -->
## Getting Started

This is an example of how you may give instructions on setting up your project locally.
To get a local copy up and running follow these simple example steps.


### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/orhngkc/case-study.git
   ```
2. Install packages
   ```sh
   composer install
   ```
3. Start docker with laravel sail
   ```sh
   ./vendor/bin/sail up
   ```
   Now you can view http://localhost/. You can also access phpmyadmin on port:8001.
   username:sail password:password
5. Running migrations
   ```sh
   ./vendor/bin/sail artisan migrate
   ```
6. Running seeders for developer list
   ```sh
    ./vendor/bin/sail artisan db:seed --class=DeveloperSeeder
   ```
7. Get tasks with command
   ```sh
    ./vendor/bin/sail artisan app:fetch-tasks   
   ```
8. Now you can go to localhost and see the job distribution list :)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

[product-screenshot]: images/screenshot.png
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
[JQuery.com]: https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white
[JQuery-url]: https://jquery.com 
