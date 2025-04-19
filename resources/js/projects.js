// resources/js/projects.js
import React from 'react';
import ReactDOM from 'react-dom';
import ProjectsList from './components/Projects/ProjectsList';

if (document.getElementById('projects-react')) {
    ReactDOM.render(
        <ProjectsList initialProjects={window.laravelData?.initialProjects || []} />,
        document.getElementById('projects-react')
    );

    document.addEventListener('DOMContentLoaded', function() {
        const rootElement = document.getElementById('projects-root');
        if (rootElement) {
            ReactDOM.render(
                <React.StrictMode>
                    <div style={{padding: '20px'}}>
                        {/* Your React content */}
                    </div>
                </React.StrictMode>,
                rootElement
            );
        }
    });
}