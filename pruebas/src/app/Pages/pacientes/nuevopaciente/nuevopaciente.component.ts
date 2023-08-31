import {Component, OnInit} from "@angular/core";
import {FormBuilder, FormControl, FormGroup, Validators} from "@angular/forms";
import {PacientesService} from "../../../Services/pacientes.service";
import {EstadoCivilService} from "../../../Services/estado-civil.service";
import {TipoSangreService} from "../../../Services/tipo-sangre.service";
import {ToastrService} from "ngx-toastr";
import {ActivatedRoute, Router} from "@angular/router";

@Component({selector: "app-nuevopaciente", templateUrl: "./nuevopaciente.component.html", styleUrls: ["./nuevopaciente.component.scss"]})
export class NuevopacienteComponent implements OnInit {
    paciente_form : FormGroup;
    listaEstados : any[];
    listaTipos : any[];
    estadopaciente : boolean;
    libro_id : number;

    constructor(private fb : FormBuilder, private pacienteServicio : PacientesService, private estadocivil : EstadoCivilService, private tiposagre : TipoSangreService, private toastr : ToastrService, private rutas : Router, private parametrosurl : ActivatedRoute) {}

   

    ngOnInit(): void {
        this.paciente_form = this.fb.group({
            titulo: new FormControl("", Validators.required),
            fecha_publicacion: new FormControl("", Validators.required),
            editorial: new FormControl("", Validators.required),
            genero: new FormControl("", Validators.required),
            sinopsis: new FormControl("", Validators.required),
            autor_id: new FormControl("", Validators.required),
            // tipo: new FormControl("", Validators.required),
        });
        this.estadocivil.todos().subscribe((lista) => (this.listaEstados = lista));
        this.tiposagre.todos().subscribe((lista) => {
            this.listaTipos = lista;
            console.log(lista);
        });

        this.parametrosurl.params.subscribe((parametros) => {
            if (parametros["id"] !== undefined) {
                this.estadopaciente = true;
                this.libro_id = parametros["id"];
                this.pacienteServicio.uno(this.libro_id).subscribe((unpaceinte) => {
                    this.paciente_form.patchValue({
                        titulo: unpaceinte.titulo,
                        fecha_publicacion: unpaceinte.fecha_publicacion,
                        editorial: unpaceinte.editorial,
                        genero: unpaceinte.genero,
                        sinopsis: unpaceinte.sinopsis,
                        autor_id: unpaceinte.autor_id,
                        
                        // estado: unpaceinte.estado,
                    });
                });
            }
        });
    }

    guardar() {
        console.log(this.paciente_form.value);
        if (!this.estadopaciente) {
            this.pacienteServicio.insertar(this.paciente_form.value).subscribe((datos) => {
                if (datos == "ok") {
                    this.toastr.success('<span class="now-ui-icons ui-1_bell-53"></span> Welcome to <b>Now Ui Dashboard</b> - a beautiful freebie for every web developer.', "", {
                        timeOut: 8000,
                        closeButton: true,
                        enableHtml: true,
                        toastClass: "alert alert-success alert-with-icon",
                        positionClass: "toast-top-right"
                    });
                    this.rutas.navigate(["/pacientes"]);
                } else {
                    console.log(datos);
                }
            });
        }else{

          this.pacienteServicio.actualizar(this.paciente_form.value, this.libro_id).subscribe((datos) => {
            
            if (datos == "ok") {
                this.toastr.success('<span class="now-ui-icons ui-1_bell-53"></span> Se guardo con exito</b> ', "", {
                    timeOut: 8000,
                    closeButton: true,
                    enableHtml: true,
                    toastClass: "alert alert-success alert-with-icon",
                    positionClass: "toast-top-right"
                });
                this.rutas.navigate(["/pacientes"]);
            } else {
                console.log(datos);
            }
        });
        }

    }
}
