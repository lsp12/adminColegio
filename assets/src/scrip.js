class Buscar{
    constructor(){
        this.persona=[
            {nombre:"jonathan", edad:27},
            {nombre:"Any", edad:24},
            {nombre:"Anyle", edad:24},
            {nombre:"Mauricio", edad:28}
        ];
        this.personaBK=this.persona;
        this.onInit();
        console.log(this.persona);
    }
    onInit(){
        let cuerpo= document.getElementById("cuerpo");
        while (cuerpo.rows.length>0) {
            cuerpo.deleteRow(0);
        }
        this.persona.forEach(persona =>{
            let fila =cuerpo.insertRow(cuerpo.rows.leght);
            fila.insertCell(0).innerHTML = persona.nombre;
            fila.insertCell(1).innerHTML = persona.edad;
        })
    }
    buscar(id){
        
        let busquedad = id;    
        this.persona = this.personaBK;
        this.persona=this.persona.filter(persona=>{
            return persona.nombre.toLowerCase().indexOf(busquedad)>-1;
        });
        this.onInit()
    }
}
let busqueda =new Buscar()
let form = document.getElementById("busquedaForm").addEventListener('submit',()=>{
    let busquedad = document.getElementById("valor").value;
    busqueda.buscar(busquedad)
});
function myFunction(){
    let busquedad = document.getElementById("valor").value;
    busqueda.buscar(busquedad)
}