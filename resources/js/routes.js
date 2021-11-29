import Layout from './layouts/Dashboard.vue';


// Orgs
const OrgProfile = () => import('./pages/organization/Profile.vue');
import OrganizationIndex from './pages/organization/Index.vue';
import Members from './pages/organization/membership/Members.vue';
import Categories from './pages/organization/membership/Categories.vue';
import Subscriptions from './pages/organization/membership/Subscriptions.vue'
import MembershipRequests from './pages/organization/membership/Requests.vue';
const MemberProfile = () => import('./pages/organization/membership/Profile.vue');


// Admin
import Dashboard from './pages/admin/Dashboard.vue';
import Users from './pages/admin/users/Users.vue';
import Organizations from './pages/admin/organizations/Organizations.vue';
import AdminEvents from './pages/admin/events/Events.vue';
import AdminPayments from './pages/admin/payments/Payments.vue';


// Individual
const UserProfile = () => import('./pages/individual/Profile.vue');
const UpdateProfile = () => import('./pages/individual/UpdateProfile.vue');
const IndividualDashboard = () => import('./pages/individual/Dashboard.vue');
const UserOrganizations = () => import('./pages/individual/organizations/Index.vue');


// Gen
const ListEvents = () => import('./pages/events/List.vue');
const EventInfo = () => import('./pages/events/EventInfo.vue');
const CreateEvent = () => import('./pages/events/CreateOrUpdate.vue');
const EventRequests = () => import('./pages/events/Requests.vue');
const EventDetails = () => import('./pages/events/EventDetails.vue');
const EventInvitation = () => import('./pages/events/EventInvitation.vue');

// Pages
const PaymentIndex = () => import('./pages/payments/Index.vue');
const TicketPayment = () => import('./pages/payments/Ticket.vue');

import PageNotFound from './views/PageNotFound.vue';


const routes = [
	
	// Pages
	{
		path: '/payments',
		component: Layout,

		children: [
			{
				path: 'ticket',
				name: 'ticket-payment',
				component: TicketPayment
			},

			{
				path: 'response',
				name: 'payment-response-page',
				component: PaymentIndex
			}
		]
	},

	// Orgaization
	{
		path: '/organization',
		component: Layout,
		meta: { transition: 'zoom' },

		children: [
			{
				path: '/',
				name: OrganizationIndex,
				component: OrganizationIndex,
				meta: { transition: 'zoom' },
			},

			{
				path: 'events/create',
				name: 'create-event',
				component: CreateEvent,
				meta: { transition: 'zoom' },
			},

			{
				path: 'events/requests',
				name: 'update-event',
				component: EventRequests,
				 meta: { transition: 'zoom' },
			},

			{
				path: 'events/invites',
				name: 'event-invites',
				component: EventInvitation
			},

			{
				path: 'events/:id',
				name: 'event-details',
				component: EventDetails
			},

			{
				path: 'events/:id/edit',
				name: 'update-event',
				component: CreateEvent,
				 meta: { transition: 'zoom' },
			},

			{
				path: 'events/:id/info',
				name: 'event-info',
				component: EventInfo,
				 meta: { transition: 'zoom' },
			},

			{
				path: 'events',
				name: ListEvents,
				component: ListEvents
			},

			{
				path: 'members',
				name: Members,
				component: Members
			},

			{
				path: 'members/requests',
				name: 'membership-requests',
				component: MembershipRequests
			},

			{
				path: 'members/:id',
				name: 'member-profile',
				component: MemberProfile
			},

			{
				path: 'categories',
				name: Categories,
				component: Categories
			},

			{
				path: 'categories/:id',
				name: Categories,
				component: Categories
			},

			{
				path: 'subscriptions',
				name: Subscriptions,
				component: Subscriptions
			},

			{
				path: 'profile',
				name: 'org-profile',
				component: OrgProfile
			}		
		]
	},



	/* Individual */
	{
		path: '/individual',
		component: Layout,

		children: [
			{
				path: '/',
				name: 'individual-dashboard',
				component: IndividualDashboard
			},
			
			{
				path: 'events/create',
				name: 'create-event',
				component: CreateEvent,
				meta: { transition: 'zoom' },
			},

			{
				path: 'events/requests',
				name: 'update-event',
				component: EventRequests,
				 meta: { transition: 'zoom' },
			},

			{
				path: 'events/invites',
				name: 'event-invites',
				component: EventInvitation
			},

			{
				path: 'events/:id',
				name: 'event-details',
				component: EventDetails
			},

			{
				path: 'events/:id/edit',
				name: 'update-event',
				component: CreateEvent,
				 meta: { transition: 'zoom' },
			},

			{
				path: 'events/:id/info',
				name: 'event-info',
				component: EventInfo,
				 meta: { transition: 'zoom' },
			},

			{
				path: 'events',
				name: ListEvents,
				component: ListEvents
			},

			{
				path: 'organizations',
				name: 'my-organizations',
				component: UserOrganizations
			},

			{
				path: 'organizations/:status',
				name: 'my-organizations',
				component: UserOrganizations
			},

			{
				path: 'profile',
				name: 'user-profile',
				component: UserProfile
			},

			{
				path: 'profile/edit',
				name: 'update-profile',
				component: UpdateProfile
			}
		]
	},



	/* Admin */
	{
		path: '/admin',
		component: Layout,

		children: [
			{
				path: '/',
				name: 'admin-dashboard',
				component: Dashboard
			},
			{
				path: 'users',
				name: 'admin-all-users',
				component: Users
			},
			{
				path: 'users/:status',
				name: 'admin-specific-users',
				component: Users
			},
			{
				path: 'organizations',
				name: 'admin-all-organizations',
				component: Organizations
			},
			{
				path: 'organizations/:status',
				name: 'admin-specific-organizations',
				component: Organizations
			},
			{
				path: 'events',
				name: 'admin-events',
				component: AdminEvents
			},
			{
				path: 'payments',
				name: 'admin-payments',
				component: AdminPayments
			}
		]
	},


	{
		path: '**',
		name: 'page-not-found',
		component: PageNotFound
	}
]

export default routes;