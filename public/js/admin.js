 window.addEventListener('DOMContentLoaded', function(){
        const crear = document.getElementById('form-crear');
        const editar = document.getElementById('form-editar');
        const eliminar = document.getElementById('form-eliminar');
            crear.style.display = 'none';
            editar.style.display = 'none';
            eliminar.style.display = 'none';
        document.getElementById('imagenes').addEventListener('change', function() {
            const maxFiles = 6;
            if (this.files.length > maxFiles) {
                alert(`Solo puedes subir un máximo de ${maxFiles} imágenes.`);
                this.value = "";
            }
        });
    });
function controlAdmin(opt){
        const crear = document.getElementById('form-crear');
        const editar = document.getElementById('form-editar');
        const eliminar = document.getElementById('form-eliminar');
        if(opt == 'crear'){
            crear.style.display = 'block';
            editar.style.display = 'none';
            eliminar.style.display = 'none';
        }else if(opt == 'editar'){
            crear.style.display = 'none';
            editar.style.display = 'block';
            eliminar.style.display = 'none';
        }else if(opt == 'eliminar'){
            crear.style.display = 'none';
            editar.style.display = 'none';
            eliminar.style.display = 'block';
        }
    }
document.addEventListener('DOMContentLoaded',()=>{
    let alerta = document.querySelectorAll('.alert-error');
    alerta.forEach(function(alerta) { 
      setTimeout(function() { 
        alerta.style.display = 'none';
       }, 150000);
      });
 });
 
  document.getElementById('select').addEventListener('change',()=>{
    const pro = document.getElementById('pro');
    const nombre = document.getElementById('');
    let project = JSON.parse(pro.getdataset.proyectos);
    project.forEach( p =>{
        
    });

  });  