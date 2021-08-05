import MainView from "../views/MainView";
import LoginView from "../views/LoginView";
import GroupView from "../views/GroupView";
import GroupCreateView from "../views/GroupCreateView";

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

];

export default routes;
