const app = new Vue({
	el: '#app',
	data() {
		return {
			tweets: null,
			loading: true
		}
	},
	mounted: function() {
		axios
			.get('/api/all')
			.then(response => (this.tweets = response.data))
			.finally(() => this.loading = false)
	},
	methods: {
		submitTweet() {
			this.items.push({
				message: this.$refs.message.value,
				name: this.$refs.user.value
			})
		}
	}
});