const app = new Vue({
	el: '#app',
	data() {
		return {
			tweets: null,
			loading: true,
			followers: null,
			follows: null,
		}
	},
	mounted: function() {
		axios
			.get('/api/all')
			.then(response => (
				this.tweets = response.data
			))
			.finally(() => this.loading = false)

		axios
			.get('/api/follows')
			.then(response => (this.follows = response.data))

		axios
			.get('/api/followers')
			.then(response => (this.followers = response.data))


	},
	methods: {
		submitTweet() {
			this.tweets.push({
				img: "https://www.kodefork.com/static/users/images/user.png",
				message: this.$refs.message.value,
				username: this.$refs.username.value,
				fullname: this.$refs.fullname.value
			})

			this.$refs.message.value = "";
		}
	}
});