This is a [CodeIgniter3 V3.1.13](https://codeigniter.com) with [NGINX](https://www.nginx.com).

## Penggunaan

- build

      docker compose build

- create

      docker compose create

- start

      docker compose start

- one line => Builds, (re)creates, starts, and attaches to containers for a service.

      docker compose up
      docker compose up -d => --detach , -d		Detached mode: Run containers in the background

- cek image

      docker image ls
      atau menggunakan group
      docker image ls | grep nama => docker image ls | grep codeigniter-3

- cek container

      docker container ls -a
      atau
      docker compose ps

- stop

      docker compose down

- hapus image

      docker image rm IMAGE ID

- masuk ke dalam container nginx

      docker exec -i -t nginx-codeigniter-3-api-minuman-kekinian /bin/bash

- masuk ke dalam container projek

      docker exec -i -t codeigniter-3-api-minuman-kekinian-docker /bin/bash

- copy vendors

      composer install --prefer-dist --no-dev --no-scripts --no-progress --no-interaction

      docker cp codeigniter-3-api-minuman-kekinian-docker:/var/www/html/vendor ./CodeIgniter3-V3.1.13

- list file

      ls -al

- masuk ke API

      http://localhost:8080

## Informasi

- codeigniter 3 api minuman kekinian docker ini saya buat menggunakan php:7.3.33-fpm + NGINX

## Donasi

- jika kalian suka dengan projek saya dan ingin support saya, bisa donasi via transfer
  - Jago/Jago Syariah bank digital 5055-6459-9169
