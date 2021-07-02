const Welcome = () => import('./components/Welcome.vue')
const CategoryList = () => import('./components/category/List.vue')
const CategoryCreate = () => import('./components/category/Add.vue')
const CategoryEdit = () => import('./components/category/Edit.vue')

const CreateUser = () => import('./components/users/create_user.vue')
const CreateUserConfirm = () => import('./components/users/create_user_confirm.vue')
const IndexUser = () => import('./components/users/index_user.vue')
const UpdateUser = () => import('./components/users/update_user.vue')
const User_Profile = () => import('./components/users/user_profile.vue')
const UpdateUserConfirm = () => import('./components/users/update_user_confirm.vue')


const CreatePost = () => import('./components/posts/create_post.vue')
const CreatePostConfirm = () => import('./components/posts/create_post_confirm.vue')
const IndexPost = () => import('./components/posts/index_post.vue')
const UpdatePost = () => import('./components/posts/update_post.vue')
const UpdatePostConfirm = () => import('./components/posts/update_post_confirm.vue')

const uploadCSV = () => import('./components/csv/upload_csv.vue')
const changePassword = () => import('./components/bullet/change_password.vue')

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Welcome
    },
    {
        name: 'categoryList',
        path: '/category',
        component: CategoryList
    },
    {
        name: 'categoryEdit',
        path: '/category/:id/edit',
        component: CategoryEdit
    },
    {
        name: 'categoryAdd',
        path: '/category/add',
        component: CategoryCreate
    },


    /* user*/
    {
        name: 'CreateUser',
        path: '/users/create_user',
        component: CreateUser
    },
    {
        name: 'CreateUserConfirm',
        path: '/users/:id/create_user_confirm',
        component: CreateUserConfirm
    },
    {
        name: 'IndexUser',
        path: '/users/index_user',
        component: IndexUser
    },
    {
        name: 'UpdateUser',
        path: '/users/:id/update_user',
        component: UpdateUser
    },
    {
        name: 'UpdateUserConfirm',
        path: '/user/:id/update_user_confirm',
        component: UpdateUserConfirm
    },
    {
        name: 'User_Profile',
        path: '/users/:id/user_profile',
        component: User_Profile
    },


     /* post*/
     {
        name: 'CreatePost',
        path: '/posts/create_post',
        component: CreatePost
    },
    {
        name: 'CreatePostConfirm',
        path: '/posts/:id/create_post_confirm',
        component: CreatePostConfirm
    },
    {
        name: 'IndexPost',
        path: '/posts/index_post',
        component: IndexPost
    },
    {
        name: 'UpdatePost',
        path: '/posts/:id/update_post',
        component: UpdatePost
    },
    {
        name: 'UpdatePostConfirm',
        path: '/posts/:id/update_post_confirm',
        component: UpdatePostConfirm
    },


    /**csv */
    {
        name: 'uploadCSV',
        path: '/csv/upload_csv',
        component: uploadCSV
    },
    /**change Pass */
    {
        name: 'changePassword',
        path: '/bullet/change_password',
        component: changePassword
    }
]