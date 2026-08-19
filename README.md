# Bakery Shop

## Deploy on Render

This project runs on Render as a Docker web service using Apache and PHP 8.2.

1. Create a MySQL-compatible database with a provider such as Aiven, Railway, or PlanetScale. Render does not provide a native MySQL database.
2. In Render, create a **Blueprint** from this repository. Render will read `render.yaml` and build the Docker service.
3. Set these environment variables for the web service: `MYSQL_HOST`, `MYSQL_PORT`, `MYSQL_DATABASE`, `MYSQL_USER`, and `MYSQL_PASSWORD`.
4. Import `bakery_shop_db.sql` into that database before opening the site.

The app uses the checked-in images for its initial catalog. Files uploaded through the admin panel are written to `upload/`, which is ephemeral on Render's free plan and can be lost after a redeploy or restart. Use object storage for permanent uploads in production.
