import React from 'react';
import Results from './Results.jsx';

/**
 * BEWARE!!
 * This is a class-based component. It is nothing to be scared of, it will
 * no harm you in any way. It is just older than the functinal components
 * that you are using and should continue to use in the future.
 */
export default class Search extends React.Component {
    constructor(props) {
        super(props)

        this.search_results = {
            '': []
        };

        this.state = {
            search_term: '',
            results: []
        }
    }

    onInputChange = (e) => {
        this.setState({
            search_term: e.target.value
        })
    }

    onFormSubmit = (e) => {
        e.preventDefault();
    }

    doSearch(term) {
        this.search_results[term] = null;

        fetch('/api/animal?s=' + encodeURIComponent(this.state.search_term), {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-type': 'application/json'
            }
        })
        .then(r => r.json())
        .then(data => {
            this.search_results[term] = data;
            this.forceUpdate();
        })
    }

    componentDidUpdate(prevProps, prevState) {
        // compare with previous props
        if (prevState.search_term !== this.state.search_term) {
            if (typeof(this.search_results[this.state.search_term]) == 'undefined') {
                this.doSearch(this.state.search_term);
            }
        }
    }

    render() {

        return (
            <form className="search-form" action="/api/animal" method="get" onSubmit={ this.onFormSubmit }>

                <label htmlFor="">
                    Search (with React):<br />
                    <input type="text" name="s"
                        value={ this.state.search_term }
                        onChange={ this.onInputChange }
                        placeholder="Enter name" />

                </label>

                {
                    typeof(this.search_results[this.state.search_term]) != 'undefined'
                    ? <Results results={ this.search_results[this.state.search_term] } />
                    : ''
                }

            </form>
        )
    }
}