Pasos a seguir para la configuración 

1 Clonar el repositorio

'''git clone...'''

2 Configurar el archivo .env

''' cp .env .env.local '''

3 Instalar las dependencias

''' docker compose up -d '''
''' docker compose exec web bash '''
Cortés -> ''' docker exec -it spotify-api /bin/bash '''
''' composer install '''

4. Ejecutar el proyecto

''' mysql -u root -pdbrootpass -h dbms-add < spotify.sql '''

LAURA:
        Usuarios        ✔ Acabarlo bien (faltan cosas)
        Suscripciones   ✔
        Canciones       -
        Albums
        Idioma          ✔
        Tipo descarga   ✔
        
Se puede exportar la coleccion de postman. Click derecho exportar

CORTES:
        Configuraciones         
        Podcast         -
        Capitulos       ✔
        Playlist
        Artistas        ✔
        Calidad         ✔

Cuando se elimina una playlist NO se ELIMINA de la tabla "playlist", 
sino que se le pasa el id a la tabla "eliminada" y se borra de la tabla "activa", 
y si quieres recuperarla se borra de la tabla "eliminada" y se vuelve a añadir a "activa".