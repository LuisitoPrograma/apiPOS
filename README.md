![apiPOS](https://apierp.dev/apiPOS/img/icon/android-icon-36x36.png) apiPOS - Punto de Venta Integrable y Ultrarrápido
    
**Sistema de Punto de Venta** (POS) desarrollado en JavaScript Nativo, diseñado para integrarse de forma rápida y sencilla con cualquier sistema de ventas, facturación o ERP mediante API REST. Su tecnología web offline permite operar con o sin conexión a internet, garantizando continuidad en las operaciones y evitando interrupciones.

## ¿Por qué elegir apiPOS?
- **Carga 100% cliente**: Todas las operaciones se procesan en el navegador, liberando recursos en el servidor backend.  
- **Offline & Online**: Funciona sin conexión y sincroniza automáticamente cuando recupera la conectividad.  
- **Implementación Rápida**: Solo requiere iniciar sesión y configurar tu Webhook.  
- **Modular y Extensible**: Se adapta a escenarios de retail, restaurante y hotelería. 

## Características (v3.00)
- **Ventas**: Boletas, Facturas y Recibos.  
- **Compras**: Boletas, Facturas y Recibos.  
- **Gastos**: Clasificación por cuentas contables.  
- **Cotizaciones**  
- **Restaurante**: Comandas, Precuentas, Gestión de Mesas y Ambientes.  
- **Hotelería**: Reservas, Pedidos por Habitación, Gestión de Pisos.  
- **Inventario**: Control de Stock y Alertas (mínimo y vencimiento).  
- **Caja**: Apertura, Cierre y Turnos.  
- **Impresión Automática**: Online y en red con apiPrint.  
- **PDF Dinámicos**: Tickets y A4.  
- **PWA**: Instalación multiplataforma y pantalla completa.  
- **Permisos de Usuario**: Roles y series por sucursal o usuario.  
- **Sucursales y Almacenes**

## Requisitos
1. **Registro y Auth Token**: Regístrate en [apiERP.dev](https://apierp.dev/signup/) para obtener tu Auth Token único (USD $3/mes).  
2. **Servidor Web**: Apache o Nginx.  
3. **PHP**: Versión >= 8.0 con extensiones `soap` y `curl`.  
4. **apiPrint**: Para impresión automática ([documentación](https://www.apierp.dev/apiprint)). 

## Instalación y Configuración
git clone https://github.com/tu-usuario/apiPOS.git  
cd apiPOS  
cp config.example.php config.php  
# Edita config.php con tu Auth Token y Webhook URL  

1. Clona o descarga este repositorio.  
2. Configura tu servidor web apuntando a la carpeta `public/`.  
3. Edita `config.php` con tu Auth Token y Webhook URL.  
4. Abre la ruta `/login` en tu navegador y autentícate.  
5. ¡Listo! Comienza a emitir operaciones.  

## Documentación y Soporte
- 🔗 Sitio oficial: https://www.apierp.dev/  
- ❓ Dudas o ayuda: [WhatsApp](https://api.whatsapp.com/send/?phone=942328698&text=%C2%A1Hola+Luisito+Programa%21+Necesito+ayuda+con+apiPOS.&type=phone_number)  
- 📘 Blog y actualizaciones en [Facebook](https://www.facebook.com/apiPOSdev)  
- 🎥 Tutoriales en [YouTube](https://youtu.be/8mvbJq2nLxk?si=ZZFL4gpChfwVLZJs)  

---

## Comunidad
- Síguenos en [Facebook](https://www.facebook.com/apiERPdev) y únete a la comunidad de desarrolladores.

---

## Productos Relacionados
- **Fasyb ERP**: El primer ERP integrado con apiPOS ([fasyb.com](https://www.fasyb.com/)).  
