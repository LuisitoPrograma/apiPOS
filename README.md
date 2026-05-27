# ![apiPOS](https://apierp.dev/apiPOS/img/icon/android-icon-36x36.png) apiPOS
[![apiERP](https://github.com/LuisitoPrograma/apiPOS/blob/main/img/icon/git-apierp.jpg)](https://www.apierp.dev/)
[![apiPOS](https://github.com/LuisitoPrograma/apiPOS/blob/main/img/icon/git-apipos.jpg)](https://apierp.dev/apiPOS/)
[![Fasyb ERP](https://github.com/LuisitoPrograma/apiPOS/blob/main/img/icon/git-fasyberp.jpg)](https://www.fasyb.com/)

**Sistema de Punto de Venta (POS)** desarrollado en JavaScript Nativo, diseñado para integrarse de forma rápida y sencilla con cualquier sistema de ventas, facturación o ERP mediante API REST. Su tecnología web offline permite operar con o sin conexión a internet, garantizando continuidad en las operaciones y evitando interrupciones.

## Ingeniería Aplicada
- **Progressive Web App (PWA)**: Instalación multiplataforma y un único código que se adapta en aplicaciones de escritorio, móvil y tablet, no es necesario desarrollar y mantener diferentes bases de código para iOS, Android o Web.
- **Carga 100% del lado del cliente**: Todas las operaciones se procesan en el navegador, liberando recursos en el servidor backend.
- **Arquitectura Offline**: Funciona sin conexión a internet y sincroniza las operaciones online automáticamente cuando detecta conectividad, todo en segundo plano.
- **Implementación Rápida**: Solo requiere iniciar sesión y configurar tu Webhook con tu sistema.
- **Modular y Extensible**: Segmentado para todos los rubros comerciales como distribuidoras, ferreterías, retail, barber shops, restaurantes y hotelería.
- **apiPrint - Impresión Online y en Red**: Permite configurar un Server Print para enviar comandas e impresiones automatizadas en formato ticket o A4 desde cualquier dispositivo con o sin conexión a internet.
- **Gestión de Mesas y Pedidos en Red**: Gracias a su arquitectura offline, si en un restaurante se pierde la conexión a internet, se podrá seguir visualizando de forma ininterrumpida el mapa de las mesas con sus pedidos en todos los dispositivos de la red local. La información siempre estará actualizada y sincronizada en red para todos los dispositivos de los mozos, caja y cocina.

## Versión ^4.0.0
- **Ventas**: Boletas, Facturas y Recibos.
- **Compras**: Boletas, Facturas y Recibos.
- **Gastos**: Clasificación por cuentas contables.
- **Cotizaciones**: Envíos automatizados por whatsapp y correo electrónico.
- **Inventario**: Control de stock por almacen y sucursales.
- **Registros**: Registro HTML de Items, Importación ultrarrápida de items con una plantilla Excel (.CSV) 100% Offline.
- **Distribución**: Rastreo de Rutas y Delivery con API de Google Maps.
- **Restaurante**: Comandas, Precuentas, Gestión de Mesas y Ambientes.
- **Hotelería**: Reservas, Pedidos por Habitación y Gestión de Pisos.
- **Caja**: Apertura, Cierre y Turnos.
- **Impresión Automática**: Online y en red con [apiPrint](https://www.apierp.dev/apiprint).
- **PDF Dinámicos**: Formatos Ticket y A4.
- **Privilegios por Usuario**: Puede/no puede vender sin stock, visualizar items por almacen/todos los almacenes, imprimir automáticamente/manualmente, agregar/no agregar repetidamente un item, series por usuario/por sucursal, impresión online/offline, mostrar/no mostrar el nombre del lote en los PDF, mostrar/no mostrar la fecha de vencimiento del item en los PDF, configurar tipo de operación por default, puede/no puede visualizar el detalle del cierre del turno, puede/no puede ver el stock del item, configurar número de decimales, sincronizar mesas online/offline, modo seguro/modo ultrarrápido, puede/no puede operar sin haber aperturado un turno previo.
- **Notificaciones**: Alertas de stock mínimo, fecha de vencimiento, cumpleaños de un colaborador, cumpleaños de un cliente, cuentas por cobrar, cuentas por pagar.
- **apiERP**: API de Facturación Electrónica integrada con Lycet / Greenter. API de Consultas RUC / DNI ilimitadas. API de envío y recepción de Email, se pueden enviar correos electrónicos desde Gmail's Personales o Correos Corporativos. apiPRINT para impresión automática online y en red. apiWAChat, un API de Whatsapp con Inteligencia Artificial.

## Requerimientos
1. **Registro y Auth Token**: Regístrate en [apiERP.dev](https://apierp.dev/signup/) para obtener tu Auth Token Único.
2. **Servidor Web**: Apache o Nginx.
3. **PHP**: Versión >= 8.0 con extensiones `soap` y `curl`.
4. **apiPrint**: Para impresión automática online y en red ([documentación](https://www.apierp.dev/apiprint)).

## Instalación y Configuración
1. Clona o descarga este repositorio.
2. Configura tu servidor web apuntando a la carpeta `apiPOS/`.
3. Configura tu Auth Token y Webhook URL.
4. Abre la ruta `apiPOS/` en tu navegador y autentícate.
5. ¡Listo! Comienza a operar en apiPOS.

## Documentación y Soporte
- 🔗 Sitio oficial: [www.apierp.dev](https://www.apierp.dev/)
- ❓ Dudas o ayuda: [WhatsApp](https://api.whatsapp.com/send/?phone=954738620&text=%C2%A1Hola+Luisito+Programa%21+Necesito+ayuda+con+apiPOS.&type=phone_number)
- 📘 Blog y actualizaciones en [Facebook](https://www.facebook.com/apiPOSdev)
- 🎥 Tutoriales en [YouTube](https://youtu.be/8mvbJq2nLxk?si=ZZFL4gpChfwVLZJs)
- 🔖 Control de Cambios y [Versiones](https://github.com/LuisitoPrograma/apiPOS/blob/main/Versions.md)

---

## Comunidad
- Síguenos en [Facebook](https://www.facebook.com/LuisitoPrograma).
- También en el [Facebook de apiERP](https://www.facebook.com/apiERPdev).
- Suscríbete al canal de [Youtube](https://www.youtube.com/@luisito.programa).

---

## Productos Relacionados
- **Fasyb ERP**: El primer ERP integrado con apiPOS ([www.fasyb.com](https://www.fasyb.com/)).
- Sigue a Fasyb ERP en [Facebook](https://www.facebook.com/FasybERP).

- **apiERP**: Todas las herramientas necesarias para construir ERP's personalizados de manera rápida, eficiente y adaptada a las necesidades de tus clientes ([www.apierp.dev](https://www.apierp.dev/)).
1. API Consultas RUC / DNI.
2. API Facturación Electrónica.
3. API Impresion Online / En Red (apiPrint).
4. API Official de apiPOS.
5. API Delivery con Google Maps.
6. API Whatsapp.
7. API Inteligencia Artificial.
8. Muchas más ...