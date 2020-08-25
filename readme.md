# Installation 

- Download Docker (if not available)
- Setup make related things (if note available)
- Open project and create a `.env` file in the directory
- Update the database section with the following 
    ```DB_CONNECTION=mysql
     DB_HOST=db
     DB_PORT=3306
     DB_DATABASE=elearning
     DB_USERNAME=root
     DB_PASSWORD=pass
- Open project directory in a terminal window
- Run `make network`
- Run `make` 
- Open project in another terminl window while the server is running
    ```make build
       make composer
       make key
       make migrate
       make seed
       make npm
    ```
- Visit http://localhost:443

# Seeded users

- User: user@user.com password: password
- Admin: admin@admin.com password: password
