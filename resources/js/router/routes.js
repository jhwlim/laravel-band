import MainView from "../views/MainView";
import GroupView from "../views/GroupView";

const routes = [
    {
        path: '/',
        component: MainView,
    },
    {
        path: '/group/:id',
        component: GroupView,
    },
];

export default routes;
