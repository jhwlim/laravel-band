import MainView from "../views/MainView";
import LoginView from "../views/LoginView";
import GroupView from "../views/group/GroupView";
import GroupCreateView from "../views/group/GroupCreateView";
import GroupEditView from "../views/group/GroupEditView";

const routes = [
    {
        path: '/',
        component: MainView,
    },
    {
        path: '/login',
        component: LoginView,
    },
    {
        path: '/group/create',
        component: GroupCreateView,
    },
    {
        path: '/group/:id',
        component: GroupView,
    },
    {
        path: '/group/:id/edit',
        component: GroupEditView,
    }

];

export default routes;
