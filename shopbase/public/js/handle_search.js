class DetailsModal extends HTMLElement{
	constructor(){
		super();
		this.details = this.querySelector('details');
		if(!this.details.value()){
			this.details.setAttribute('open','true');
		}else{
			this.details.removeAttr('open','true');
		}
	}
}
customElements.define('details-modal', DetailsModal);