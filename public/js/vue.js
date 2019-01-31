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
			this.tweets.push({
				img: "https://www.kodefork.com/static/users/images/user.png",
				message: this.$refs.message.value,
				username: this.$refs.username.value,
				fullname: "Alexandre Bétourné"
			})

			this.$refs.message.value = "";
		}
	}
});