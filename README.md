# ITMA II - SII 🏫

## Proyecto desarrollado en Blue Code ⌨️

## Pre-requisitos 📋

* Node js ^v18
* PHP ^8.1
* MariaDB
* Composer
* Host virtual "itma2.sii"

## Comandos a ejecutar despues de descargar el proyecto 🔧

```
composer install
npm i
npm run build
```

## Configuraciones ⚙️

* Restauracion de la BD "sii" (solo ese archivo) a lojada en la carpeta "db"
* Hacer una copia del archvio ".env.example"
* Eliminar los comentarios dentro del archivo
* Cambiar el nombre de ".env.example" a ".env"
* Llenar los datos del archivo en base a las configuraciones de tu MariaDB

## NO EDITAR! 🔩

**Archivos alojados en carpeta "app/Config"**

## CLI Blue Code ⌨️


### Creacion de modelos

**modelo en carpeta modelos**
```
node seiryu model NombreModelo 
```
**modelo en subcarpeta**
```
node seiryu model NombreModelo dir:NombreCarpeta
```

### Creacion de controladores
**controlador en carpeta Controllers (php)**
```
node seiryu controller NombreControlador
```
**controlador en subcarpeta**
```
node seiryu controller NombreControlador dir:NombreCarpeta
```

### Creacion de vistas

**vista en carpeta principal**
```
node seiryu view NombreVista
```
**vista en subcarpeta**
```
node seiryu view NombreVista dir:NombreCarpeta
```

### Creacion de controlador de JS

**controlador en capeta src/controller**
```
node seiryu src NombreControlador
```
**controlador en subcarpeta**
```
node seiryu src NombreControlador dir:NombreCarpeta
```

## Construido con 🛠️

* [BLUE CODE](https://itma2.github.io/code-blue-guia/) - El framework web usado (Autor: Ing. Diego Bollas)

## Licencia 📄

TECNM CAMPUS MILPA ALTA II | 2021 - 2025 |


---
⌨️ con ❤️ de [Diego](https://github.com/Yakumo-Sahashi) para ITMA II
