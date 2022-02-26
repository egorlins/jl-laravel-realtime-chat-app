import Stats from "@/Components/Stats";
import Authenticated from "@/Layouts/Authenticated";
import { Head } from "@inertiajs/inertia-react";
export default function StatsPage(props) {
    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Stats
                </h2>
            }
        >
            <Head title="Stats" />

            <div className="py-2">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <Stats auth={props.auth} statsData={props.statsData} />
                </div>
            </div>
        </Authenticated>
    );
}
