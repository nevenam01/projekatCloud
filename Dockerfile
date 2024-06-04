FROM wordpress:latest

COPY wp-content /var/www/html/wp-content

EXPOSE 80

ENTRYPOINT ["docker-entrypoint.sh"]

CMD ["apache2-foreground"]

