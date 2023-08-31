import { Routes } from '@angular/router';

import { DashboardComponent } from '../../dashboard/dashboard.component';
import { UserProfileComponent } from '../../user-profile/user-profile.component';
import { TableListComponent } from '../../table-list/table-list.component';
import { TypographyComponent } from '../../typography/typography.component';
import { IconsComponent } from '../../icons/icons.component';
import { MapsComponent } from '../../maps/maps.component';
import { NotificationsComponent } from '../../notifications/notifications.component';
import { PacientesComponent } from '../../Pages/pacientes/pacientes.component';
import { AlumnosComponent } from '../../Pages/alumnos/alumnos.component';

import { NuevopacienteComponent } from '../../Pages/pacientes/nuevopaciente/nuevopaciente.component';


export const AdminLayoutRoutes: Routes = [
    { path: 'dashboard',      component: DashboardComponent },
    { path: 'user-profile',   component: UserProfileComponent },
    { path: 'table-list',     component: TableListComponent },
    { path: 'typography',     component: TypographyComponent },
    { path: 'icons',          component: IconsComponent },
    { path: 'maps',           component: MapsComponent },
    { path: 'notifications',  component: NotificationsComponent },
    { path: 'pacientes',  component: PacientesComponent },
    { path: 'alumnos',  component: AlumnosComponent },

    { path: 'nuevopaciente',  component: NuevopacienteComponent },
    { path: 'editarpaciente/:id',  component: NuevopacienteComponent }

];

