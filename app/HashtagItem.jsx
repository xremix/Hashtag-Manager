
var ResultControl = React.createClass({
	getTags: function(){
		var _tags = this.props.lists.map(function(l){ 
			return l.tags.map(function(t){ 
				return t.checked ?  t.name : undefined 
			})
		});
		_tags = [].concat.apply([], _tags);
		_tags = _tags.filter(function(t){return t != undefined});
		return _tags;
	},
	getText: function(){
		return this.getTags().join(" ");
	},
	handleClick: function (e){
		console.log(this.getText());
	},
	render: function() {
		var tagsCount = this.getTags().length < 15 ? <span>{this.getTags().length}</span> : <span style={{color:'red'}}>{this.getTags().length}</span>;
		return (
			<div className="result-container input-group input-group-lg">
				<textarea value={this.getText()} className="form-control" ></textarea>
				<div>
					{tagsCount} Tags<br/>
					<a className="btn btn-success" onClick={this.handleClick}>CLIPBOARD</a>
				</div>
			</div>
			);
	}
});

var HashtagList = React.createClass({
	handleClick: function(e){
		var _list = this.props.hashtagList.tags;
		this.props.hashtagList.tags[e].checked = !this.props.hashtagList.tags[e].checked;
		this.props.onUpdate();
	},
	checkAll: function(){
		console.log(this.props.hashtagList);
		this.props.hashtagList.tags = this.props.hashtagList.tags.map(function(t){
			t.checked = true;
			return t;
		});
		this.props.onUpdate();
	},
	addNew: function(e){
		this.props.hashtagList.tags.push({
			checked: false,
			name: this.state.listNewInput,
		});
		this.props.onUpdate();
	},
	handleInputChange: function(event){
		this.setState({listNewInput: event.target.value});
	},
	render: function(){
		var childs = [];
		if(this.props.hashtagList && this.props.hashtagList.tags && this.props.hashtagList.tags){
			for (var i = 0; i < this.props.hashtagList.tags.length; i++) {
				childs.push(
					<li key={this.props.hashtagList.tags[i].name} onClick={this.handleClick.bind(this, i)}><input type="checkbox" checked={this.props.hashtagList.tags[i].checked} /> {this.props.hashtagList.tags[i].name}</li>
				);
			}
		}
		// var addNewButton = this.props.hashtagList !== null ? <li><input type="text" defaultValue="#" className="form-control" onChange={this.handleInputChange} /><a onClick={this.addNew} className="btn btn-default">Add</a></li> : null;
		var addNewButton = this.props.hashtagList !== null ? <li>
																<div className="input-group">
															      <input type="text" defaultValue="#" className="form-control" onChange={this.handleInputChange} />
															      <span className="input-group-btn">
															        <a onClick={this.addNew} className="btn btn-default">Add</a>
															      </span>
															    </div>
															</li> : null;
		var checkAllButton = childs.length ? <li><a onClick={this.checkAll} className="btn btn-default">Check all</a></li> : null;
		return <ul className="hashtag-container">
					{checkAllButton}
					{childs}
					{addNewButton}
				</ul>;
	}
});

var ListControl = React.createClass({
	handleClick: function(e){
		this.setState({currentList: this.props.lists[e]});
	},
	getList: function(){
		var rows = [];
		for (var i = 0; i < this.props.lists.length; i++) {
			rows.push(<li key={this.props.lists[i].key} onClick={this.handleClick.bind(this, i)}>{this.props.lists[i].name} <i className="fa fa-chevron-right" style={{float: 'right', color:'#c0c0c0'}} aria-hidden="true"></i></li>);
		};
		return rows;
	},
	handleInputChange: function(event){
		this.setState({listNewInput: event.target.value});
	},
	addNew: function(){
		console.log(this.state.listNewInput);
		if(this.state.listNewInput){
			var lists = this.props.lists;
			lists.push({name: this.state.listNewInput, tags: []});
			this.props.onUpdate();
		}
	},
	render: function() {
		return (
			<div>
				<div className="col-xs-6">
					<ul className="list-container">
					<li>
						<div className="input-group">
					      <input type="text" className="form-control" onChange={this.handleInputChange} />
					      <span className="input-group-btn">
					        <a onClick={this.addNew} className="btn btn-default">Add</a>
					      </span>
					    </div>
					</li> 
						{this.getList()}
					</ul>
				</div>
				<div className="col-xs-6">
					<HashtagList hashtagList={this.state && this.state.currentList} onUpdate={this.props.onUpdate} />
				</div>
			</div>
		);
	}
});

var HashtagControl = React.createClass({
	getInitialState: function() {
		var _this = this;
	    return {
	    	lists: []
	    };
	 },
	 componentDidMount: function() {
	 	var self = this;
	 	this.serverRequest = $.ajax({
	 		url: 'api',
	 		success:function (result) {
	 			result = JSON.parse(result);
	 			self.setState({lists: result});
	 		}.bind(this)
	 	});
	 },
	renderSync: function(){
		return (<div>
				<a className="btn btn-default" onClick={this.handleSyncClick}>Sync</a>
			</div>);
	},
	onUpdate: function(){
		this.setState({date: new Date()});
	},
	handleSyncClick: function(e){
		$.post("api/index.php",
		{
			hashtaglists: JSON.stringify(this.state.lists)
		},
		function(data, status){
			// alert("Success");
		});
	},
	render: function() {
		return (
			<div className="commentBox container">
				<div className="row">
					<div className="col-xs-12">
						<ResultControl lists={this.state.lists} onUpdate={this.onUpdate} />
						<hr/>
						<ListControl  lists={this.state.lists} onUpdate={this.onUpdate} />
					</div>
				</div>
				{this.renderSync()}
			</div>
			);
	}
});

$(document).ready(function(){
	ReactDOM.render(
		<HashtagControl />,
		document.getElementById('example')
		);
});