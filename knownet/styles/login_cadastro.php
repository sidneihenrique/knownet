<style>
	@import url('https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500&display=swap');

	:root {
		--black: #272727;
		--white: #FFFFFF;
		--blue:  #3484CF;
		--grey:  #707070;

	}

	* {
		margin: 0;
		padding: 0;
	}

	body {
		display: flex;
	}

	img {
		width: 265px;
		margin-bottom: 1.5%;
	}

	h1 {
		font-size: 32px;
		font-family: 'Baloo 2', cursive;
		font-weight: 500;
		color: var(--grey);
	}

	p, a {
		font-family:  'Baloo 2', cursive;
	}

	.sectionLeft {
		display: flex;
		flex-direction: column;
		background-color: var(--black);
		width: 60%;
		height: 100vh;
		justify-content: center;
		align-items: 	 center;
		color: var(--white);
	}

	.sectionRight {
		display: flex;
		flex-direction: column;
		background-color: var(--white);
		width: 40%;
		height: 100vh;
		justify-content: space-between;
		align-items: 	 center;
	}

	.sectionRight p {
		align-self: center;
	}

	.sectionRight a {
		color: var(--blue);
	}

	.sectionRight img {
		width: 160px;
		display: flex;
		align-self: center;
	}

	form {
		width: 					    60%;
		display: 				   flex;
		height: 				  100vh;
		margin-top: 			   20vh;
		flex-direction: 		 column;
		gap: 					   16px;
		font-family: 'Baloo 2', cursive;
	}

	input {
		width:  				   96%;
		padding: 			2% 0 2% 2%;
		height: 				  30px;
		border: 2px solid var(--black);
		border-radius: 			   7px;
		color: 			  var(--black);


	}

	input:focus {
		border: 2px solid var(--blue);
	}

	button {
		width:  				   100%;
		height: 				   40px;
		margin-top: 			   32px;
		font-family: 'Baloo 2', cursive;
		font-size: 				   26px;
		color: 			   var(--white);
		background-color:   var(--blue);
		border: 				   none;
		border-radius: 				7px;
	}

	button :hover {
		background-color: #215f98;
	}
</style>