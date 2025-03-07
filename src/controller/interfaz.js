bootstrap.Itma2.start_loader();
(() => {
    "use strict";
  
    // ITMA II: Se obtienen el header, sidebar y main.
    const header = document.getElementById('header');
    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('main');
  
    // ITMA II: Evento encargado de asignar a sidebar la regla top con su valor del alto del header, también para main, al momento de terminar la carga de página. 
    window.onload = () => {
        bootstrap.Itma2.end_loader();
      try {
        sidebar.style.top = `${header.offsetHeight}px`;
      } catch(error) {}
      main.style.marginTop = `${header.offsetHeight}px`;
    }
  
    // ITMA II: Evento encargado de asignar a sidebar la regla top con su valor del alto del header, también para main, al momento de reajustar la página.
    window.onresize = () => {
      try {
        sidebar.style.top = `${header.offsetHeight}px`;
      } catch(error) {}
      main.style.marginTop = `${header.offsetHeight}px`;
    }
  
    // ITMA II: Fución que permite seleccionar los elementos.
    const select = (el, all = false) => {
      el = el.trim()
      if (all) {
        return [...document.querySelectorAll(el)]
      } else {
        return document.querySelector(el)
      }
    }
  
    // ITMA II: Función para asignar eventos a cualquier elemento.
    const on = (type, el, listener, all = false) => {
      if (all) {
        select(el, all).forEach(e => e.addEventListener(type, listener))
      } else {
        select(el, all).addEventListener(type, listener)
      }
    }
  
    // ITMA II: Función para escuchar el evento scroll.
    const onscroll = (el, listener) => {
      el.addEventListener('scroll', listener)
    }
  
    // ITMA II: Funcionalidad para mostrar y ocultar el sidebar.
    if (select('.toggle-sidebar-btn')) {
      on('click', '.toggle-sidebar-btn', (e) => {
        select('body').classList.toggle('toggle-sidebar')
      })
    }
    
    // ITMA II: Detecta si el Sidebar esta presente o no para que Main y Footer tomen todo el ancho.
    select('.sidebar') == null && [
      document.getElementById('main').style.marginLeft = '0',
      document.getElementById('footer').style.marginLeft = '0'
    ];
  
    // ITMA II: Retornar a página superior
    let backtotop = select('.back-to-top')
    if (backtotop) {
      const toggleBacktotop = () => {
        if (window.scrollY > 100) {
          backtotop.classList.add('active')
        } else {
          backtotop.classList.remove('active')
        }
      }
      window.addEventListener('load', toggleBacktotop)
      onscroll(document, toggleBacktotop)
    }
  
    // ITMA II: Inicializar Tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map( (tooltipTriggerEl) => {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
  
    // ITMA II: Inicializar DataTables
    const datatables = select('.datatable', true)
    datatables.forEach(datatable => {
      new simpleDatatables.DataTable(datatable);
    })
  })();