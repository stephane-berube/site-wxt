FROM drupalwxt/site-wxt:minio AS www-data
MAINTAINER William Hearn <sylus1984@gmail.com>

FROM nginx:alpine

COPY --from=www-data /var/www/ /var/www/

CMD ["nginx", "-g", "daemon off;"]
