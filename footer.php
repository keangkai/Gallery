                        <!-- Footer -->
                        <footer id="footer">
                            <p class="copyright">&copy; Untitled. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
                        </footer>

						</div>
					</div>

			</div>

		    <!-- Scripts -->
			<script>
				var data;
				var resultBox = document.querySelector("#result");
				var pagination, pages, perPage = 5, number_of_page, pagination_button = '';
				var path = window.location.pathname;
				var pageName = path.split("/").pop();
				var searchInput = document.querySelector("#search-input");

				searchInput.addEventListener("keyup", function(event) {
					event.preventDefault();
					if (event.keyCode === 13) {
						showResult(event.target.value);
					}
				});

				var observer = new MutationObserver(function(mutationList) {
					pagination = document.querySelectorAll(".page");
					for(var p of pagination) {
						p.addEventListener('click', function() {
							let start_element = (this.id - 1) * perPage;
							console.log(start_element);
							resultBox.innerHTML = '';
							for(let i = start_element; i < start_element + perPage; i++) {
								if (data[i]) {
									resultBox.innerHTML += `
										<section>
											<header class="main">
												<a href="showContent.php?id=${data[i][0]}&category=${encodeURIComponent(data[i][4])}"><h1 id="title_name">${data[i][1]}</h1></a>
											</header>
											<a href="showContent.php?id=${data[i][0]}&category=${encodeURIComponent(data[i][4])}"><span class="image main"><img src="data:image/jpeg;base64,${data[i][3]}"/></span></a>
											<a href="showContent.php?id=${data[i][0]}&category=${encodeURIComponent(data[i][4])}"><p>${data[i][2]}</p></a>
										</section>`;
								}
							}
							resultBox.innerHTML += pagination_button;
						});
					}

				});
				observer.observe(resultBox, {childList: true, subtree: true});

				function showResult(str) {
					resultBox.innerHTML = '';
					if (window.XMLHttpRequest) {
						xmlhttp = new XMLHttpRequest();
					}
					xmlhttp.onreadystatechange = function() {
						resultBox.innerHTML = `Loading...`;
						if (this.readyState == 4 && this.status == 200) {
							resultBox.innerHTML = '';
							pagination_button = '';
							data =  JSON.parse(this.responseText);
							pages = data.length;
							number_of_page = Math.ceil(pages / perPage);
							let start_element = 0;
							for(let i = start_element; i < start_element + perPage; i++) {
								if (data[i]) {
									resultBox.innerHTML += `
										<section>
											<header class="main">
												<a href="showContent.php?id=${data[i][0]}&category=${encodeURIComponent(data[i][4])}"><h1 id="title_name">${data[i][1]}</h1></a>
											</header>
											<a href="showContent.php?id=${data[i][0]}&category=${encodeURIComponent(data[i][4])}"><span class="image main"><img src="data:image/jpeg;base64,${data[i][3]}"/></span></a>
											<a href="showContent.php?id=${data[i][0]}&category=${encodeURIComponent(data[i][4])}"><p>${data[i][2]}</p></a>
										</section>`;
								}
							}

							if (pages !== 0) {
								pagination_button += `<center><ul class="pagination">`;
								for(let i = 1; i <= number_of_page; i++) {
									pagination_button += `<li>
																<a href="#" id="${i}" class="page">${i}</a>
															</li>`;
								}
								pagination_button += `</ul></center>`;
								resultBox.innerHTML += pagination_button;
							}
						}
					}
					xmlhttp.open("GET",`search.php?c=${encodeURI(pageName)}&q=` + str,true);
					xmlhttp.send();
				}
			</script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>