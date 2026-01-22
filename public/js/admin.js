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
    document.getElementById('select-edit').addEventListener('click',function(){
        
        const pro = document.getElementById('pro');
        const idProject = document.getElementById('idProject')
        const nombre = document.getElementById('nombre');
        const descripcion = document.getElementById('descripcion');
        const nombre1 = document.getElementById('nombre-h1');
        const nombre2 = document.getElementById('nombre-h2');
        const nombre3 = document.getElementById('nombre-h3');
        const nombre4 = document.getElementById('nombre-h4');
        const descripcion_h1 = document.getElementById('descripcion-h1');
        const descripcion_h2 = document.getElementById('descripcion-h2');
        const descripcion_h3 = document.getElementById('descripcion-h3');
        const descripcion_h4 = document.getElementById('descripcion-h4');
        const wed = document.getElementById('web');
        const github = document.getElementById('github');
        let proyecto = JSON.parse(pro.dataset.proyectos).find(p => p.name === this.value);
        
        if(proyecto){
            idProject.value = proyecto.idProject;
            nombre.value = proyecto.name;
            descripcion.value = proyecto.details;
            wed.value = proyecto.web;
            github.value = proyecto.github; 
            proyecto.skills.forEach((p,i)=>{
                if(i == 0){
                    nombre1.value = p.skill
                    descripcion_h1.value = p.details
                }else if(i == 1){
                    nombre2.value = p.skill
                    descripcion_h2.value = p.details
                }else if(i == 2){
                    nombre3.value = p.skill
                    descripcion_h3.value = p.details
                }else if(i == 3){
                    nombre4.value = p.skill
                    descripcion_h4.value = p.details
                }

            });
            
        }

    }); 
});
        
 document.addEventListener('DOMContentLoaded',()=>{
    let alerta = document.querySelectorAll('.alert-error');
    alerta.forEach(function(alerta) { 
      setTimeout(function() { 
        alerta.style.display = 'none';
       }, 3000);
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