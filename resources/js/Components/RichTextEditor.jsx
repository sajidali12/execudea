// resources/js/components/RichTextEditor.js

import React from 'react';
import ReactQuill from 'react-quill';
import 'react-quill/dist/quill.snow.css'; // Import Quill's CSS

const RichTextEditor = ({ value, onChange }) => {
    return (
        <ReactQuill
            value={value}
            onChange={onChange}
            modules={RichTextEditor.modules}
            formats={RichTextEditor.formats}
        />
    );
};

// Configure Quill modules and formats
RichTextEditor.modules = {
    toolbar: [
        [{ 'header': '1'}, { 'header': '2' }],
        ['bold', 'italic', 'underline'],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        ['link', 'image'],
        [{ 'align': [] }],
    ],
};

RichTextEditor.formats = [
    'header', 'font', 'size',
    'bold', 'italic', 'underline',
    'list', 'bullet', 'indent',
    'link', 'image', 'align',
];

export default RichTextEditor;
