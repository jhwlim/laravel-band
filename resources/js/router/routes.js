import MainView from "../views/MainView";
import LoginView from "../views/LoginView";
import GroupView from "../views/GroupView";

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
        path: '/group/:id',
        component: GroupView,
    },
];

export default routes;
