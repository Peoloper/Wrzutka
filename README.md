
## Project Overview 🎉
About the wrzutka 

This is a project where the logged in user can add meme. Then the users can express liking of this meme by adding a plus to it. The more added pluses under that meme would mean better chances of placing it to the home page by the administrator or moderator.

## Tech/framework used 🔧

| Tech                                                    | Description                              |
| ------------------------------------------------------- | ---------------------------------------- |
| [PHP](https://www.php.net/docs.php)                           | version 7.4   |
| [Laravel](https://laravel.com/docs/8.x/readme)                           | version 8.x   |
| [Vue](https://vuejs.org/guide/introduction.html)                           | version 3.x   |
| [Bootstrap](https://getbootstrap.com/docs/5.0/getting-started/introduction/)                           | version 5.0   |
| [Spatie Permission ](https://spatie.be/docs/laravel-permission/v5/introduction)                           | version 5.4   |
| [Yajra datatables](https://datatables.yajrabox.com/starter)                           | version 1.5   |
| [Intervention-Images](https://image.intervention.io/v2)                           | version 2.7   |
| [Sweet-Alert](https://github.com/realrashid/sweet-alert)                           | version 4.1   |
| [Vue-Toaster](https://www.npmjs.com/package/@meforma/vue-toaster/v/1.3.0)                           | version 1.3   |
| [Vue-Image-Crop-Upload](https://www.npmjs.com/package/vue-image-crop-upload)                           | version 3.0.3   |
| [Vue-Cropper](https://www.npmjs.com/package/vue-cropperjs)                           | version 5.0.0   |


## Screenshots 📺

<p align="center">
Home Page
</p>

<p align = "center">
<img src="https://user-images.githubusercontent.com/82052456/158614167-a706e33d-409f-45e2-8bf2-3c26b1ae8d60.PNG">
</p>


<p align="center">Add mem </p>

<p align="center">

<img src="https://user-images.githubusercontent.com/82052456/158614279-337e6b83-6043-4533-8bd8-52dbfd7ab822.PNG">
</p>


<p align="center">Waiting page </p>

<p align="center">

<img src="https://user-images.githubusercontent.com/82052456/158614297-e8b1bd81-3d79-4a93-8081-394d6dec29d2.PNG">
</p>

<p align="center">Admin LTE Panel </p>

<p align="center">

<img src="https://user-images.githubusercontent.com/82052456/158614312-15f1efe0-28e0-4c30-a594-b4bb01ab714b.PNG">
</p>

## Installation 💾
Clone the repository

    https://github.com/Peoloper/Wrzutka.git

Switch to the repo folder

    cd wrzutka

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Run the database migrations

    php artisan migrate

Run the database seeder

    php artisan db:seed

Run to generate a secret key

    php artisan key:generate

Start the local development server

    php artisan serve

