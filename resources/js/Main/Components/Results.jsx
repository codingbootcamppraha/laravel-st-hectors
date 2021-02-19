import React from 'react';

/**
 * BEWARE!!
 * This is a class-based component. It is nothing to be scared of, it will
 * no harm you in any way. It is just older than the functinal components
 * that you are using and should continue to use in the future.
 */
export default class Search extends React.Component {
    constructor(props) {
        super(props)
    }

    render() {

        let results = this.props.results
            ? this.props.results.map(result => (
                <a href={ `/animal/${result.id}` } key={ result.id } className="result">
                    <div className="img">
                        <img src={ `/images/${result.image.path}` } alt={ result.name }/>
                    </div>
                    <div>
                        <div className="name">{ result.name }</div>
                        <div className="type">{ result.breed } ({ result.species })</div>
                        {
                            result.owner ? (
                                <div className="owner"><span>Owned by</span> { result.owner.first_name + ' ' + result.owner.surname }</div>
                            ) : ''
                        }
                    </div>
                </a>
            ))
            : '';


        return (
            <div className="results">
                { results }
            </div>
        )
    }
}