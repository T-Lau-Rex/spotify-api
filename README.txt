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
        Usuarios        - Corregir DELETE | PUT
        Suscripciones   ✔ 
        Canciones       - Falta POST | DELETE
        Albums          ✔
        Idioma          ✔
        Tipo descarga   ✔        

CORTES:
        Configuraciones ✔
        Podcast         ✔
        Capitulos       ✔
        Playlist        ✔
        Artistas        ✔
        Calidad         ✔