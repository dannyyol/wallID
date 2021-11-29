import VuexPersistence from 'vuex-persist'

const vuexLocal = new VuexPersistence({
  storage: window.localStorage
})

const state = () => ({
	profile: null
});

const getters = {
	profile: (state, getters) => {
		return state.profile;
	}
};

const actions = {
	profile: ({ state, commit, rootState }) => {
		if(state.profile == null) {
			axios.get('/api/users')
			.then(response => {
				commit('profile', response.data.data);
			})
			.catch(err => {
				console.warn('Profile Error', err);
			})
		}
	}
};

const mutations = {
	profile: (state, profile) => {
		state.profile = profile
	}
};

export default {
	namespaced: true,
	state,
	getters,
	actions,
	mutations,
	plugins: [vuexLocal.plugin]
}