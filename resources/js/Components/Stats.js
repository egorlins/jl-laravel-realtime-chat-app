import React from "react";

import { Link } from "@inertiajs/inertia-react";

class Stats extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">Number of messages {this.props.statsData.messagesCount}</div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Stats;
